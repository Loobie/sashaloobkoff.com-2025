#!/usr/bin/perl -w

use DBI;
use CGI;
use LWP;
use LWP::UserAgent;
use HTML::Parser ();
use strict;

#### For CGI.pm
my $q = new CGI;

#### For DBI
my $page;

#### Functions
sub parse_function {
  my $dtext = shift;
  print "$dtext\n";
}

my $url = "http://yahoo.com/";

  ############ looking at url ############
      #### create a user agent object
      my $ua = LWP::UserAgent->new;
      $ua->agent("AgentLoobie ");

      #### create a request for header of url page
      my $req = HTTP::Request->new(GET => $url);

      #### pass request to the user agent (AgentLoobie) and get a response back
      my $res = $ua->request($req);
      if ($res->is_success) {
      $page = $res->content;
      } else {
          print "Couldn't access the page.";
      }
  

  #### parse out html
  my @words = ();
  my $p = HTML::Parser->new(api_version => 3);     
  $p->handler(text => \@words, 'dtext');
  $p->parse($page);
 
  my $newWords;
  my @newWords;
 
  for (@words) {
    $newWords = $newWords . "@$_";   #### need @ to reference value instead of location
  }
    #### clean up
    # replace multiple spaces and returns with space
    $newWords =~ s/\s+/ /g;
    $newWords =~ s/\s{1,}/ /g;
    
    # replace special characters with space
    $newWords =~ s/\&\#(\w{1,})\;/ /g;
    $newWords =~ s/&(\w{1,})\;/ /g;   #### could've gone one line but it's acting up
    $newWords =~ s/\<(\w)*>/ /g;
    
    # replace comments with space
    $newWords =~ s/( > )/ /g;
    $newWords =~ s/( >= )/ /g;
    $newWords =~ s/(<!)([^>]+)(>)/ /g;
    
    # replace punctuation with space
    $newWords =~ s/[(--)\=\#\|\!\+\^\?\.\,\;\'\"\~\)\(\\\/\{\}\:\`\[\]\&\*\%\$\>\<]+/ /g;
    
    # replace multiple spaces and returns with space AGAIN
    $newWords =~ s/\s{1,}/:/g;

    

    #### put $newWords into array
    $_ = $newWords;
    @newWords = split(/:/);

    
    
    



    #### data dumps
    #print "@newWords";
 
    #print $q->header;
    #print $q->start_html('Search Engine - add URL');
    #for (@newWords) {
    #  print "$_ ";
    #}
    #print $q->end_html;

