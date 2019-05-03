#!/bin/bash

ORACLE_PWD=$1

su -p oracle -c "sqlplus / as sysdba << EOF
      alter profile "DEFAULT" limit password_life_time unlimited;
      alter profile "DEFAULT" limit password_grace_time 14;
      alter user ORACLE identified by ORACLE;
      alter profile "DEFAULT" limit password_reuse_max 10 password_reuse_time 365;
EOF"
