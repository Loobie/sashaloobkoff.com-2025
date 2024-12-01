#!/usr/bin/perl -w

# Assignment: 02. First CGI (09/12/02)

use strict;
use CGI qw(:standard);

my $name;
if (param()) {
  print header;
  $name = param('name');
  $name =~ tr/a-z/A-Z/;
  print start_html('Nice to meet '.$name.'.');
  print "Hello, ",b($name), ", nice to meet you!";
}

else {
  print header;
  print start_html('Input Name'),
      start_form,
      "Name: ",textfield('name'),
      submit(-value=>'Set My Name'),
      end_form;
}
print end_html;
