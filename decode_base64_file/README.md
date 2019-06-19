# decode_base64_file
A PHP script to read a file containing a base64 string, transform this string into binary, and putting this binary into a new file.

## Usage
To decode file toto.base64 into file toto.binary
```bash
./decode_base64_file toto.base64 toto.binary
```

## Installation
Having PHP at least 5, then :
```bash
wget -O decode_base64_file.php https://raw.githubusercontent.com/OsaAjani/php-tools/master/decode_base64_file/decode_base64_file.php
sudo mv decode_base64_file.php /usr/bin/decode_base64_file
sudo chmod +x /usr/bin/decode_base64_file
```
