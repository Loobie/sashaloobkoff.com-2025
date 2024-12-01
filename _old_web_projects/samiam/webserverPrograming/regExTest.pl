#!/usr/bin/perl -w

use strict;


my $word = "xx/xxx///";

print $word;
print "\n";
$word =~ s/(\/){1,}$//;
print $word;
