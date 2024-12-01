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
  sub start_handler
  {
    return if shift ne "title";
    my $self = shift;
    $self->handler(text => sub { print shift }, "dtext");
    $self->handler(end  => sub { shift->eof if shift eq "title"; },
		           "tagname,self");
  }



my $url = "http://www.cnn.com/cnn/programs/selectedition/asia/";

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
  

  #### parse out html $ tags
  my @words = ();
  my @tags = ();
  my $p = HTML::Parser->new(api_version => 3);     
  $p->handler(text => \@words, 'text');     
  $p->handler(start => \@tags,'text');
  $p->parse($page);
 
  #### deal with html first
  
  my $words;

  #### put Words into scalar context
  for (@words) {
    $words = $words . "@$_";   #### need @ to reference value instead of location
  }
  
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

    #### put back into array
    @words = ();    #### clear out array
    $_ = $words;
    @words = split(/ /);

    print "@words\n\n\n\n";
    
    #### deal with tags
    my $tags;

    foreach (@tags) {
      $tags = $tags . "@$_";    #### need @ to reference value instead of location
    }

    #### put back into array
    @tags = ();

    #### clear out array
    $_ = $tags;
    @tags = split(/></);

 
  $p->handler( start => \&start_handler, "tagname,self");
  $p->parse($page) || die $!;

#    my $i = 1;
#   foreach (@tags) {

#      if ( ( /^(a href)( )?=( )?([\/\?\w\"\'\.\?\-]{1,})(\s+)?/ ) && ( $i < 5 ) ) {
#        print "$_\n";    #### need @ to reference value instead of location
#        if ( /^(a href)( )?=( )?"(http\:\/\/[\w\.]{1,0})?([\/\?\w\'\.\?\-\_]{1,})(\s+)?/ ) {
#          print "$5\n";
#          $i++;
          
#        }
#      }
#    }
    


    #### data dumps
 
    #print $q->header;
    #print $q->start_html('Search Engine - add URL');
    #for (@newWords) {
    #  print "$_ ";
    #}
    #print $q->end_html;

