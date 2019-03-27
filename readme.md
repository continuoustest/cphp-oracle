# CPHP Oracle

Test Behat for Oracle additional container called by workers 

## Getting Started

These instructions will get you running on your local machine for development and testing purposes. 

### Prerequisites

You need to access to the cphp oracle container
 
### Installing

#### Configuring Behat on the local environment :
* Installing composer :
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
* Installing Behat:
```
php composer.phar require --dev behat/behat
```
* Verifying Behat:
```
vendor/bin/behat -V
```

#### Configuring Oracle (Client & Server) :

* Inside the container (server) :
```
lsnrctl start
/bin/bash -c "echo '127.0.0.1 $HOSTNAME' >> /etc/hosts"
expose port 1521
execute /u01/app/oracle/runOracle.sh
```

* In the local environment (client) :
```
"downloading client librairies"
pecl install oci8
php path/to/composer.phar require jpina/oci8
(sudo) /bin/bash -c "echo '127.0.0.1 $(hostname)' >> /etc/hosts"
```

#### Avoiding the "password will expire in 7 days" warning
```
su -p oracle -c" sqlplus ORACLE/ORACLE as SYSDBA <<EOF
alter profile "DEFAULT" limit password_life_time unlimited;
alter profile "DEFAULT" limit password_grace_time 14;
alter user ORACLE identified by ORACLE;
alter profile "DEFAULT" limit password_reuse_max 10 password_reuse_time 365;
EOF"
