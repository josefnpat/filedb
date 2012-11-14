## FileDB

# Purose

To securely keep a database of files with encrypted filenames and passwords.

# Requirements

* gpg
* 7z

# Usage

usage: filedb [options]

Options:
  i|init          Initialize the database.
  e|encrypt       Encrypt the database.
  d|decrupt       Decrypt the database.
  a|add           Add a file record to the database and encrypt the file to
                  those specifications.
  l|list          List the file records.
