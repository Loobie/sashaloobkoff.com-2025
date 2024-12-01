#!/usr/bin/perl -w

# Assignment: 06. PERL Guestbook (10/3/02)

use DBI;
use CGI;
use strict;
my $q = new CGI;

my $database = 'n3loobko';
my $user = 'n3loobko';
my $password = 'n3loobko';

# Create form
print $q->header;
print $q->start_html('Guestbook'),
      $q->start_form;
print $q->h3('Perl Guestbook');
print $q->p;
print 'Name:';
print $q->br();
print $q->textfield('name');
print $q->p;
print 'Message:';
print $q->br();
print $q->textarea('message','',10,50);
print $q->p;
print $q->submit(-value=>'submit message'),
      $q->end_form;
print '<hr align = left width = 425>';
print $q->p;

# open database
my $dbh = DBI->connect("DBI:mysql:$database", $user, $password);
my $sql = 'INSERT INTO guestbook (Name, Message) VALUES (?,?)';
my $sth = $dbh->prepare($sql);

# enter new message (if there is one)
my $name = $q->param('name');
my $message = $q->param('message');
$sth->execute($name, $message);

# get contents of database
$sql = 'SELECT * FROM guestbook ORDER BY Date DESC';
$sth = $dbh->prepare($sql);
my $rv = $sth->execute();

# Display messages
if($rv) {
  while(my @row = $sth->fetchrow_array) {
    if ($row[1] =~ /^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})$/) {  
      print qq|<b>$row[3]</b><p>$row[2]<br>$2/$3/$1 $4:$5:$6<p><hr align = left width = 425><p>|;
    }
  }
}

$q->end_html;

    
