server "platform.webplates.xyz", user: "webplates", roles: [:app, :db, :web]

after "deploy:updated", :database do
    invoke "symfony:console", "oro:migration:load", "--force"
end
