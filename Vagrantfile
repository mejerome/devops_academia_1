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
  
  #
  config.vm.provider "virtualbox" do |vb|
    # Display the VirtualBox GUI when booting the machine
    vb.gui = false
    # Customize the amount of memory on the VM:
    vb.memory = "1024"
    vb.cpus = "1"
  end

  config.vm.define "haproxy" do |haproxy|
    haproxy.vm.hostname = "haproxy"
    haproxy.vm.network :private_network, ip: "192.168.56.4"
  end

  config.vm.define "web" do |web|
    web.vm.hostname = "web"
    web.vm.network :private_network, ip: "192.168.56.5" 
  end

  config.vm.define "db" do |db|
    db.vm.hostname = "db"
    db.vm.network :private_network, ip: "192.168.56.6"
    db.vm.provision "ansible" do |ansible|
      ansible.playbook = "playbooks/msql_db.yml"
    end
  end

  # config.vm.define "workstation" do |workstation|
  #   workstation.vm.hostname = "workstation"
  #   workstation.vm.network "private_network", type: "dhcp"
  #   workstation.vm.provision "ansible_local" do |ansible|
  #     ansible.playbook = "playbook.yml"
  #   end
  #   workstation.vm.provision "file", source: "~/.aws", destination: "~/.aws"
  # end
end
