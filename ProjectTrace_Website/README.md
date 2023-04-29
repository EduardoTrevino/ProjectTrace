# Website Replication Instructions
## AWS Virtual Machine Setup
Create an account at [aws.amazon.com](https://aws.amazon.com/).
The account will have free-tier benefits for 1 year after creation.
### Create a new EC2 instance
1.) Navigate to the EC2 Dashboard in the Management Console\
2.) Navigate to the 'Instances' tab and select 'Launch Instance'\
3.) Enter a name for your instance\
4.) Under 'Application and OS Images' select 'Ubuntu Server 22.04 LTS (HVM), SSD Volume Type' as your Amazon Machine Image\
5.) Under 'Instance Type' select 't2.micro' as your Instance type\
6.) Under 'Key Pair (login)' create a new key pair. This will create and download a .pem file that you will need in order to connect to your instance.\
7.) Under 'Network Settings' allow SSH, HTTPS, and HTTP traffic.\
8.) Under 'Configure Storage' allocate 30GiB gp2 Root volume.

After creating the instance with these settings, you will see it listed in your 'Instances' tab. Once it is running, you can select 'Connect' and follow the instructions given to connect to the instance.

While it isn't necessary, it is recommended to create an Elastic IP for your instance. This will prevent your instance's url from changing if it were to crash or be stopped.

## Nginx Setup

## Database Setup
