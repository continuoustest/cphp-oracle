# CPHP Oracle

Test Behat for Oracle additional container called by workers 

## Getting Started

These instructions will get you running on your local machine for development and testing purposes. 

### Prerequisites

You need to access to the cphp oracle container
 
### Installing

#### Configuring Behat on the local environment :
* Installing Behat:
```
composer update
```
* Verifying Behat:
```
vendor/bin/behat -V
```

#### Configuring Oracle (Client & Server) :

* Inside the container (server) :
```
su -p oracle -c" sqlplus ORACLE/ORACLE as SYSDBA <<EOF
alter profile "DEFAULT" limit password_life_time unlimited;
alter profile "DEFAULT" limit password_grace_time 14;
alter user ORACLE identified by ORACLE;
alter profile "DEFAULT" limit password_reuse_max 10 password_reuse_time 365;
EOF"
```

* In the local environment (client) :
```
"downloading client librairies"
pecl install oci8
(sudo) /bin/bash -c "echo '127.0.0.1 $(hostname)' >> /etc/hosts"
```
