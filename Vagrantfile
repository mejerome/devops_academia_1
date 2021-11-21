# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "generic/ubuntu2004"
  config.vm.synced_folder ".", "/vagrant"
  config.ssh.password = "vagrant"
  
  #
  config.vm.provider "virtualbox" do |vb|
    # Display the VirtualBox GUI when booting the machine
    vb.gui = false
    # Customize the amount of memory on the VM:
    vb.memory = "1024"
    vb.cpus = "1"
  end
  
  config.vm.define "app" do |app|
    app.vm.hostname = "app"
    app.vm.network :private_network, ip: "192.168.56.5"
    app.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "webapp.yml"

    end
  end


  config.vm.define "app2" do |app2|
    app2.vm.hostname = "app2"
    app2.vm.network :private_network, ip: "192.168.56.6"
    app2.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "webapp.yml"
    end
  end

  config.vm.define "db" do |db|
    db.vm.hostname = "db"
    db.vm.network :private_network, ip: "192.168.56.7"
  end

  config.vm.define "control" do |control|
    control.vm.hostname = "control"
    control.vm.network :private_network, ip: "192.168.56.8"
    control.vm.provision "ansible_local" do |ansible|
      ansible.playbook = "workstation.yml"
    end
  end
end
