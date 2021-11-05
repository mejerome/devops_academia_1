# -*- mode: ruby -*-
# vi: set ft=ruby :
$mysql_installation = <<-SCRIPT
  #!/bin/bash
  apt-get update
  apt-get install -y mysql-server
  mysql < /tmp/mysql_secure_installation.sql
  SCRIPT


Vagrant.configure("2") do |config|
  config.vm.box = "generic/ubuntu2004"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.synced_folder ".", "/vagrant_data"

  config.vm.provider "virtualbox" do |vb|
    vb.gui = false
    vb.memory = "1024"
    vb.cpus = 1
  end

  config.vm.define "web" do |web|
    web.vm.hostname = "web"
    web.vm.network :private_network, ip: "192.168.2.3"
    web.vm.provision "file", source: "index.php", destination: "/tmp/index.php"
    web.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2
      apt-get install php libapache2-mod-php php-mysql -y
      rm /var/www/html/index.html
      cp /tmp/index.php /var/www/html/index.php
    SHELL
  end

  config.vm.define "db" do |db|
    db.vm.hostname = "mysqldb"
    db.vm.network :private_network, ip: "192.168.2.4"
    db.vm.provision "file", source: "mysql_secure_installation.sql", destination: "/tmp/mysql_secure_installation.sql"
    db.vm.provision "shell", inline: $mysql_installation
  end

end
