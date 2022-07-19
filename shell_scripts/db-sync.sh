# create db export
wp search-replace --allow-root ${LOCAL_URL} ${REMOTE_URL} --export=vm-db-export.sql && mv vm-db-export.sql /var/www/html/export/vm-db-export.sql
# zip dump
cd /var/www/html/export
zip dump.zip vm-db-export.sql
# upload dump
echo $WEB_ROOT
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete  dump.zip $SSH_USER@$SSH_HOST:$WEB_ROOT
# unzip dump
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT; unzip -o dump.zip; rm dump.zip;"
# import dump
# rsync data
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs plugin list 
# ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT && ls"