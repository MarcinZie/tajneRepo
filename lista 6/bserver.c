/****************** SERVER CODE ****************/

#include <stdio.h>
#include <stdlib.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <string.h>
#include <openssl/rsa.h>
#include <openssl/pem.h>
#include <stdbool.h>

bool generate_key();
unsigned long hash();

int main(int argc, char *argv[]){
	
	printf("hehe");

  int welcomeSocket, newSocket;
  char buffer[1024];
  struct sockaddr_in serverAddr;
  struct sockaddr_storage serverStorage;
  socklen_t addr_size;
	

  
	

	if(strcmp(argv[1], "setup")==0){
		int keyLength;
		printf("Jaki klucz wygenerować?\n1) 2048 bitowy\n1) 2048 bitowy\n2) 4096 bitowy\n3) 8192 bitowy\n4) 16384 bitowy\n");
		scanf("%d", &keyLength);
		

		if(keyLength==1){keyLength=2048;}else if(keyLength==2){keyLength=4096;}else if(keyLength==3){keyLength=8192;}else if(keyLength==4){keyLength=16384;}

		generate_key(keyLength);

		char password[20];
		srand((unsigned int) time(0) + getpid());

		for (int i=0; i < 11; ++i){
			password[i] = rand() % (122-97) + 97;
		}

		printf("%s\n", password);

		unsigned long hashed = hash(password);
		//printf("%lu\n", hashed);

		FILE *fp;
		fp = fopen("config.txt", "w");
		if(!fp){	
			error();
		}
		fprintf(fp, "%lu", hashed);
		
		fclose(fp);
		return 0;
		}else if(strcmp(argv[1], "signservice")==0){

		printf("Wpisz hasło:");
		char password[20];		
		scanf("%s", &password);

		char buffer [sizeof(unsigned long)*8+1];		


		FILE *fp;
		fp = fopen("config.txt", "r");
		if(!fp){
			error();
		}
		char oldhash[999];
		while(fscanf(fp, "%s", oldhash)!=EOF){
			printf("%s\n", oldhash);
		}


		unsigned long hashed = hash(password);
		char s[(CHAR_BIT * sizeof(hashed)+2)/3+1];
		sprintf(s, "%lu", hashed);
		
		if (strcmp(oldhash, s)==0){
			printf("Zgadza sie");

			FILE *key;
			key = fopen("public.pem");
			char publicKey[3000];
			while(fscanf(key, "%s", publicKey)!=EOF){
				printf("%s\n", publicKey);
			}
		}
		else{
			return 0;
		}
		fclose(fp);
	

	}else{
		printf("PODAJ ARGUMENT");
	}
		

  welcomeSocket = socket(PF_INET, SOCK_STREAM, 0);
  

  serverAddr.sin_family = AF_INET;

  serverAddr.sin_port = htons(7891);
 
  serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

  memset(serverAddr.sin_zero, '\0', sizeof serverAddr.sin_zero);  

  bind(welcomeSocket, (struct sockaddr *) &serverAddr, sizeof(serverAddr));

  if(listen(welcomeSocket,5)==0)
    printf("Listening\n");
  else
    printf("Error\n");

  addr_size = sizeof serverStorage;
  newSocket = accept(welcomeSocket, (struct sockaddr *) &serverStorage, &addr_size);
int choice;
	strcpy(buffer,"Hello World\n");
  	send(newSocket,buffer,13,0);
	while(1){
		printf("Czekam na clienta");
		fflush(stdin);
		scanf("%d", &choice);
		printf("%d", choice);
		getchar();
  	}

  return 0;






}


unsigned long hash(unsigned char *str){


	int hash = 5381;
	int c;

	while (c= *str++){
		hash = ((hash << 5) + hash) + c;
	}

	return hash;


}

bool generate_key(int length)
{
    int             ret = 0;
    RSA             *r = NULL;
    BIGNUM          *bne = NULL;
    BIO             *bp_public = NULL, *bp_private = NULL;
 
    int             bits = length;
    unsigned long   e = RSA_F4;
 
    //  generate rsa key
    bne = BN_new();
    ret = BN_set_word(bne,e);
    if(ret != 1){
        goto free_all;
    }
 
    r = RSA_new();
    ret = RSA_generate_key_ex(r, bits, bne, NULL);
    if(ret != 1){
        goto free_all;
    }
 
    // save public key
    bp_public = BIO_new_file("public.pem", "w+");
    ret = PEM_write_bio_RSAPublicKey(bp_public, r);
    if(ret != 1){
        goto free_all;
    }
 
    // save private key
    bp_private = BIO_new_file("private.pem", "w+");
    ret = PEM_write_bio_RSAPrivateKey(bp_private, r, NULL, NULL, 0, NULL, NULL);
 
    
free_all:
 
    BIO_free_all(bp_public);
    BIO_free_all(bp_private);
    RSA_free(r);
    BN_free(bne);
 
    return (ret == 1);
}

