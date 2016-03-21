server "dev.platform.webplates.xyz", user: "webplates", roles: [:app, :db, :web]

after "deploy:updated", :build do
    invoke "symfony:console", "oro:install", "--organization-name Oro --user-name admin --user-email admin@example.com --user-firstname John --user-lastname Doe --user-password admin --sample-data n --application-url http://platform.webplates.xyz --force"
end
