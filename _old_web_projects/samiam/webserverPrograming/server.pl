#!/usr/bin/perl -w

# Assignment: 04. Server Lookup (09/26/02)

use strict;
use CGI qw(:standard);
use LWP;
use LWP::UserAgent;
use HTML::Template;
use DB_File;

# variable that contains url for form.html
my $back = "http://cs116.xsruid.sbcc.net/~n3loobko/form.html";

# variable that contains entered url
my $url = param('url');
  
# create a user agent object
my $ua = LWP::UserAgent->new;
$ua->agent("AgentLoobie ");

# create a request for header of url page
my $req = HTTP::Request->new(GET => $url);

# pass request to the user agent (AgentLoobie) and get a response back
my $res = $ua->request($req);

my $server = $res->header('server');
my $date = $res->header('Date');
my $content = $res->header('content_length'); 

# if response is unsuccessful stop otherwise continue
if ( ! ($res->is_success) ) {
  print header;
  print start_html('Go Back and Try Again.');
  print "Click <a href = $back>here</a> to access the Server Look Up.<P>Please make sure to enter a valid URL (ex. http://www.yahoo.com).";
  print end_html;
} else {

  # continue running script
  # open a hash to save server data
  dbmopen (my %DATA, '/home/cs116/fall02/n3loobko/public_html/serverData', 0777)
    or die "Cannot create serverData: $1";
    if ($DATA{$server}) {
      $DATA{$server}++;
    } else {
      $DATA{$server} = 1;
    }

    # Open the html template
    my $template = HTML::Template->new(filename => 'results.tmpl');
  
    my $return = "<P>";

    # First enter the header info into $results
    my $results = "<B>Header Information for: $url</B> $return Server: $server $return  Date: $date $return  Content Length: $content $return <hr> $return <B>Server Totals:</B> $return";

    # Then concatenate the server totals
    while ( my ($key, $value) = each %DATA ) {
      $results = $results . $key . ": " . $value . $return;
    }

    # Fill in the parameters
    $template->param(RESULTS=>$results);

    # create header for results.tmpl
    print header;

    #print the template
    print $template->output;

    # close dbm (hash) 
    dbmclose(%DATA);

}
