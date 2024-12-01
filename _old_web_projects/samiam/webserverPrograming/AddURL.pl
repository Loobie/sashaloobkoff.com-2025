#!/usr/bin/perl -w

use DBI;
use CGI;
use LWP;
use LWP::UserAgent;
use HTML::Parser ();
use strict;

#$| = 1;  #### turn off buffering (for the forks, you forker)


#################################################################
#### For CGI.pm
my $q = new CGI;

#################################################################
#### For DBI
my $database = 'n3loobko';
my $user = 'n3loobko';
my $password = 'n3loobko';

#################################################################
#### variables
my $urlRef = 0;
my $page = "";
my $tableName = "";
my $cancel = 0;
my $search = "http://cs116.xsruid.sbcc.net/~n3loobko/search.pl";
my $i;
my $frequency = 0;
my $sqlB;
my $sthB;
my $sqlC;
my $sthC;
my $sqlURL;
my $sthURL;
my $sqlSUB;
my $sthSUB;
my $sqlMAIN2;
my $sthMAIN2;
my $title;
my $newLink;
my $curLevel = 0;
my $version = 1;
my $pid;
my $percentage;
my $temp;

#################################################################
#### if URL is entered get to work and display results
if ($q->param()) {

  ###############################################################
  #### entered URL
  my $url = $q->param('url');
  my $breadth = $q->param('breadth');
  my $depth = $q->param('depth'); 

  ############################################################### 
  #### start html page
  print $q->header;
  print $q->start_html('Search Engine - add URL');

  ###############################################################
  #### open database
  my $dbh = DBI->connect("DBI:mysql:$database", $user, $password);

  ###############################################################  
  #### clear database of previous entries/tables

  my $sql = "SELECT * FROM url";
  my $sth = $dbh->prepare($sql); 
  my $rv = $sth->execute();

  #### drop word count tables
  if ($rv) {
    while(my @row = $sth->fetchrow_array) {;
      $sqlB = "DROP TABLE $row[2]";
      $sthB = $dbh->prepare($sqlB); 
      $sthB->execute();
    }
  }

  #### delete contents of url table
  $sql = "DELETE FROM url";
  $sth = $dbh->prepare($sql); 
  $sth->execute();

  #### delete contents of links table
  $sql = "DELETE FROM links";
  $sth = $dbh->prepare($sql); 
  $sth->execute();

  ###############################################################
  #### sub routine used to create word tables
  sub createTable {
    $sqlSUB = "CREATE TABLE $tableName (word VARCHAR(255) NOT NULL PRIMARY KEY, frequency INT NOT NULL, url INT NOT NULL)";
    $sthSUB = $dbh->prepare($sqlSUB); 
    $sthSUB->execute();
  }

  ###############################################################
  #### sub routine used to insert into link table
  sub insertLink {
    $sqlSUB = 'INSERT INTO links (link) VALUES (?)';
    $sthSUB = $dbh->prepare($sqlSUB); 
    $sthSUB->execute($newLink);
  }



  ###############################################################
  #### sub routine used to process each page
  sub page {

  ###############################################################
  #### create new database (word index) for url
  if ( $url =~ /(^(http\:\/\/)(www\.)?([\w]+))/ ) { 
    $tableName = "$4"."$version";
    &createTable($tableName);
    $version++
  }

  ###############################################################
  ############ looking at url ############
  #### create a user agent object
  my $ua = LWP::UserAgent->new;
  $ua->agent("AgentLoobie ");

  ###############################################################
  #### create a request for header of url page
  my $req = HTTP::Request->new(GET => $url);

  ###############################################################
  #### pass request to the user agent (AgentLoobie) and get a response back
  my $res = $ua->request($req);
  if ($res->is_success) {
    $page = $res->content;
  } else {
      print 'Cannot access the page.';
  } 

  ###############################################################
  #### parse out title
  my $h = HTML::HeadParser->new;
  $h->parse($page);
  $title = $h->header('Title');

  ###############################################################
  #### insert new url
  $sqlURL = 'INSERT INTO url (url, tableName, title) VALUES (?, ?, ?)';
  $sthURL = $dbh->prepare($sqlURL);
  $sthURL->execute($url, $tableName, $title);

  ###############################################################
  #### get url primary key (will be foriegn key to new table)
  $sql = 'SELECT * FROM url WHERE URL = ?';
  $sth = $dbh->prepare($sql);
  $rv = $sth->execute($url);

  ###############################################################
  #### Set Foriegn Key ($urlRef) for table
  if ($rv) {
    while(my @row = $sth->fetchrow_array) {
      $urlRef = $row[0];   #### contains PK for table url and FK for others
    }
  }

  ###############################################################      
  #### parses out html and tags  
  my $words;
  my @tags;
  my @words;
  my $newWord;
  my $p = HTML::Parser->new(api_version => 3); 
          
  $p->handler(text => \@words, 'text');     
  $p->handler(start => \@tags, 'text');
  $p->parse($page);     

  ###############################################################
  #### deal with html first

  ###############################################################
  #### put Words into scalar context
  for (@words) {
    $words = $words . "@$_";   #### need @ to reference value instead of location
  }

  ###############################################################  
  #### clean up
  # replace multiple spaces and returns with space
  $words =~ s/\s{1,}/ /g;
    
  # replace special characters with space
  $words =~ s/\&(\#)?(\w{1,})\;/ /g;
    
  # replace comments with space
  $words =~ s/( > )/ /g;
  $words =~ s/( >= )/ /g;
  $words =~ s/(<!)([^>]+)(>)/ /g;
    
  # replace punctuation with space
  $words =~ s/[(--)\=\#\|\!\+\^\?\.\,\;\'\"\~\)\(\\\/\{\}\:\`\[\]\&\*\%\$\>\<]+/ /g;
    
  # replace multiple spaces and returns with space AGAIN
  $words =~ s/\s{1,}/ /g;

   ##############################################################
   #### put back into array
   @words = ();    #### clear out array
   $_ = $words;
   @words = split(/ /);

   ##############################################################
   #### insert new data into $tableName table
   foreach (@words) {  

     ############################################################     
     #### make search case insensitive by making all characters lower case
     $_ =~ tr/A-Z/a-z/;
     $newWord = $_;

     ############################################################
     #### open database
     $sql = "SELECT * FROM $tableName where word=?";
     $sth = $dbh->prepare($sql);
     $rv = $sth->execute($newWord);
 
     ############################################################       
     #### put words in database
     #### if word is already in table, increment frequency

     if ($rv) {
       if (my @row = $sth->fetchrow_array) {
         $sqlC = "UPDATE $tableName SET frequency=frequency+1 WHERE word=?";
         $sthC = $dbh->prepare($sqlC); 
         $sthC->execute($newWord); 

         #### else add word to database
         } else { 
           $sqlB = "INSERT INTO $tableName (word, frequency, url) VALUES (?, ?, ?)";
           $sthB = $dbh->prepare($sqlB); 
           $sthB->execute($newWord, 1, $urlRef);  
         }
      }
   }

   ##############################################################
   #### Get 1st for links from page -- tags
   my $tags;

   foreach (@tags) {
     $tags = $tags . "@$_";    #### need @ to reference value instead of location
   }

   ##############################################################
   #### put back into array
   #### i do this because I'm sick of dealing with references
   @tags = ();

   ##############################################################
   #### clear out array
   $_ = $tags;
   @tags = split(/></);

   ##############################################################
   #### parse @tags array for links (a href)
   $i = 1;
   foreach (@tags) {
     $_ =~ tr/A-Z/a-z/;
     if ( ( /^(a href)( )?=( )?\"?\/?([\w\d\/\.\?\=\-\&\%\:\@\!\,]+)/ ) && ( $i <= $breadth ) ) {
       $i++;
       if ( /^(a href)( )?=( )?\"?\/?([\w\d\/\.\?\=\-\&\%\:\@\!\,]+)/ ) {
         if ( $4 =~ /http/ ) {
           $newLink = $4;
           $newLink =~ s/[\/\s]{1,}$//;
           &insertLink($newLink);
         } else {
             $temp = $4;
             $temp =~ s/[\/\s]{1,}$//;
             $temp =~ s/[\s]{1,}//;
             $newLink = "$url"."/". "$temp";
             $newLink =~ s/[\/]{1,}$//;
             &insertLink($newLink);
         }                 
       }
     }
   }
   FORK : {
     if ($pid = fork) {    #### if this is the parent...
       next;
     } else {              #### then this is the child
         print "URL added: <b>$url</b>.";
         print $q->p;
         exit(0);          #### don't want zombies
     }
   }

   }  #### end of page sub routine

   
   ##############################################################
   #### process 1st page
   &page($url);
   $curLevel++;   #### moves to curLevel 1
   print "Begin level: $curLevel"; 
   print $q->p;


   ##############################################################
   #### now we must process our links

   #### read from links table
   my $sqlMAIN = 'SELECT * FROM links ORDER BY Id';
   my $sthMAIN = $dbh->prepare($sqlMAIN);

   my $newLinks = 0;

   for ( $curLevel = 1; $curLevel <= $depth; $curLevel++ ) {   
     
     $sthMAIN->execute();

     while( (my @row = $sthMAIN->fetchrow_array) && ($newLinks <= ($breadth ** $curLevel)) ) {
         $url = $row[1];
         &page($url);
         $newLinks++;
       
         ##########################################################
         #### delete link before moving on
         $sqlMAIN2 = "DELETE FROM links WHERE link = ?";
         $sthMAIN2 = $dbh->prepare($sqlMAIN2);
         $sthMAIN2->execute($url);
     }
     $percentage = ( ( $curLevel / $depth ) * 100 );
     FORK : {
     if ($pid = fork) {    #### if this is the parent...
       next;
     } else {              #### then this is the child
         print "Finished with level $curLevel.";
         print $q->br();
         print $percentage;
         print '% of the depth has been completed.';
         print $q->p;
         exit(0);          #### don't want zombies
     }
   }

   }
   
   

   ##############################################################  
   ############ Inform use of our success ############
   print "Click here to <a href=\"$search\">search<\/a> for word counts.";
   print $q->end_html;
}

else {
  print $q->header;
  print $q->start_html('Search Engine - add URL');
  print 'Please add an URL to our search index';
  print $q->br();
  print '(Please fill in every field):';
  print $q->start_form;
  print 'URL: ';
  print $q->br();
  print $q->textfield(-name=>'url', -default=>'http://');
  print $q->p;
  print 'Breadth (links per page): ';
  print $q->br();
  print $q->textfield(-name=>'breadth');
  print $q->p;
  print 'Depth: ';
  print $q->br();
  print $q->textfield(-name=>'depth');
  print $q->p;
  print $q->submit();
  print $q->end_form;
  print $q->end_html;
}
