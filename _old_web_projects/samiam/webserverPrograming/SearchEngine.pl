#!/usr/bin/perl -w

# Assignment: 09. Search Engine (10/17/02)

use CGI;
use strict;

my $q = new CGI;
my $search = '<a href="search.pl">';
my $add = '<a href="AddURL.pl">';

# Create html
print $q->header;
print $q->start_html('Search engine');
print $q->h2('The Loobkoff Search Engine');
print 'Please select what you wish to do:';
print $q->p;
print "1) $search conduct a search</a>";
print $q->p;
print "2) $add add a url</a>";
$q->end_html;

# http://cs116.xsruid.sbcc.net/~n3loobko/
