#!/usr/bin/perl

# Assignment: 01. Hello, World in Perl (09/05/02)

use strict;
use CGI qw(:standard);

print header;
print start_html("Hello, world!");
print "Hello, world!";
print end_html;  
