# create db export
cd export
wp search-replace --allow-root ${LOCAL_URL} ${REMOTE_URL} --export=vm-db-export.sql
cd ..
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
echo "dropping db..."
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs package install iandunn/wp-cli-rename-db-prefix
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs db drop --yes
echo "dropped db, importing new dump..."
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs config set table_prefix wp_
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs db create
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs db import vm-db-export.sql
wp --allow-root --ssh=devrock@80.74.154.66:2121/httpdocs rename-db-prefix --no-confirm $REMOTE_DB_PREFIX
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT; rm vm-db-export.sql"
echo "dump imported."cv


# VOWr7e_
cd /var/www/html/wp-content

echo "mirror plugin folder"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete plugins/* $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/plugins

echo "mirror uploads folder"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete uploads/* $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/uploads


echo "sync theme"
cd /var/www/html/wp-content/themes/${THEME_FOLDER}
git config --global --add safe.directory '*'
git checkout main
git status
