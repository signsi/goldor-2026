# export db on remote, match prefix
echo "cd export"
cd ./export
echo "drop old remote dump"
rm remote-db-export.sql
echo "install package"
wp --allow-root package install iandunn/wp-cli-rename-db-prefix
echo "drop current db"
wp --allow-root db drop --yes
echo "keep remote prefix"
wp --allow-root config set table_prefix $REMOTE_DB_PREFIX


echo "search replace and export remote db"
wp --allow-root --ssh=$SSH_USER@$SSH_HOST:$SSH_PORT$REMOTE_WP_PATH search-replace $REMOTE_URL $LOCAL_URL --export=remote-db-export.sql
echo "zip dump"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT; zip remote-db-export.zip remote-db-export.sql;"
echo "get remote dump"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete $SSH_USER@$SSH_HOST:$WEB_ROOT/remote-db-export.zip remote-db-export.zip
echo "delete dump on remote"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT; rm remote-db-export.sql;"
echo "unzip locally"
unzip -o remote-db-export.zip
echo "create empty db"
wp --allow-root db create
echo "import db"
wp --allow-root db import remote-db-export.sql
echo "rename db prefix"
wp --allow-root rename-db-prefix --no-confirm wp_
echo "rewrite flush"
wp --allow-root rewrite flush

echo "delte dumps locally"
# rm -rf remote-db-export.*

# rsync uploads

# rsync plugins
cd /var/www/html/wp-content
echo "mirror plugin folder"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/plugins/* plugins
echo "mirror uploads folder"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/uploads/* uploads