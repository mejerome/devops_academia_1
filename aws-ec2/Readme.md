aws ec2 create-security-group --group-name wordpress --description "Wordpress Security" --vpc-id vpc-9a7987f0
aws ec2 authorize-security-group-ingress --group-name wordpress --protocol tcp --port 22 --cidr 0.0.0.0/0
aws ec2 authorize-security-group-ingress --group-name wordpress --protocol tcp --port 80 --cidr 0.0.0.0/0
aws ec2 run-instances --image-id ami-0d527b8c289b4af7f --instance-type t2.micro --security-group-ids sg-0db3e18c515255bd5 --key-name newec2-key.pem



