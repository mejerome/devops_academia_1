# -*- mode: ruby -*-
# vi: set ft=ruby :
$mysql_secure_installation = <<-SCRIPT
  #!/bin/bash
  apt-get update
  apt-get install -y mysql-server
  mysql < /tmp/mysql_secure_installation.sql
  SCRIPT

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "generic/ubuntu2004"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.synced_folder ".", "/vagrant_data"

  config.vm.provider "virtualbox" do |vb|
    # Display the VirtualBox GUI when booting the machine
    vb.gui = false
  
    # Customize the amount of memory on the VM:
    vb.memory = "1024"
    vb.cpus = 1
  end

  config.vm.define "web" do |web|
    web.vm.hostname = "web"
    web.vm.network :private_network, ip: "192.168.2.3"
    web.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2

      echo "Hello from the vagrant provisioned server!" > /var/www/html/index.html
    SHELL
  end

  config.vm.define "db" do |db|
    db.vm.hostname = "mysqldb"
    db.vm.network :private_network, ip: "192.168.2.4"
    db.vm.provision "file", source: "mysql_secure_installation.sql", destination: "/tmp/mysql_secure_installation.sql"
    db.vm.provision "shell", inline: $mysql_secure_installation
  end

end
