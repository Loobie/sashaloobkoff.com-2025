#!/usr/bin/perl -w

# Assignment: 05. Directory Lister (09/26/02)

use strict;
use CGI qw(:standard);

my $content = "";
my $return = "<P>";

# create hash to store projects (name) and date (value)
my %project = ();

# open directory
my $dir = "/home/cs116/fall02/n3loobko/public_html/";
opendir DIRECTORY, $dir
  or die "Cannot open directory: $!";

# look at only .pl & .php files
while ( my $name = readdir DIRECTORY ) {
  next unless ( ($name =~ /\.pl$/) || ($name =~ /\.php$/) || ($name=~ /\.py$/) );

    # open (.pl) file
    open FILE, "< $name";

      # read line by line
      while (<FILE>) {
        if ( /^(# Assignment: )(\d{1,2}\. [A-Za-z,\s]+ \(\S+)/) {
          $project{$2} = $name;   
        } else {
          next;   
        }
      }
    close FILE;
}
close DIRECTORY;

# Create content for page by parsing out specific info
foreach my $key ( sort keys %project ) {
  if ( $key =~ /^(\d{1,2}\. )([A-Za-z,\s]+ )(\(\S+)/) {
  $content = $content."<a href=\"http://cs116.xsruid.sbcc.net/~n3loobko/$project{$key}\">$2</a> $3$return";
  }
}
    
# Create html page
print header;
print start_html('Directory Listings');
 print "<B>Sasha Loobkoff - cs116</B>$return<hr width = 250 align = left>$return";
 print $content; 
print end_html;
