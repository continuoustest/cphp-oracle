FROM 310957825501.dkr.ecr.us-east-1.amazonaws.com/oracle

RUN lsnrctl start

RUN /bin/bash -c "echo '127.0.0.1 ${HOSTNAME}' >> /etc/hosts"

EXPOSE 1521

CMD ["./u01/app/oracle/runOracle.sh"]
