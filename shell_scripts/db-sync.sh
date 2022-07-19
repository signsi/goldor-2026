wp search-replace --allow-root ${LOCAL_URL} ${REMOTE_URL} --export=vm-db-export.sql && mv vm-db-export.sql /var/www/html/export/vm-db-export.sql
# upload dump
# import dump
# rsync data
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs plugin list 
# ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT && ls"