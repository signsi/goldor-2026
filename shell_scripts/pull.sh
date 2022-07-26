# export db on remote, match prefix

cd ./export
wp --allow-root package install iandunn/wp-cli-rename-db-prefix
wp --allow-root db drop --yes
wp --allow-root config set table_prefix $REMOTE_DB_PREFIX

wp --allow-root --ssh=$SSH_USER@$SSH_HOST:$SSH_PORT$REMOTE_WP_PATH search-replace $REMOTE_URL $LOCAL_URL --export=remote-db-export.sql
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT; zip remote-db-export.zip remote-db-export.sql;"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete $SSH_USER@$SSH_HOST:$WEB_ROOT/remote-db-export.zip remote-db-export.sql
unzip -o remote-db-export.zip

wp --allow-root db create
wp --allow-root db import remote-db-export.sql
wp --allow-root rename-db-prefix --no-confirm wp_
wp --allow-root rewrite flush

# zip db

# download dump

# import dump

# search replace

# clear permalinks

# rsync uploads

# rsync plugins

