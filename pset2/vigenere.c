#include <stdio.h>
#include <cs50.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

int main(int argc, string argv[])
{
    if (argc != 2)
        {
          printf("Wrong");
          return 1;
        }
        
        
    
    for(int x=0 ; x < strlen(argv[1]) ; x++)
    {
        if(!isalpha(argv[1][x]))
        {
            printf("Wrong");
            return 1;
        }
        
    }
    
    
    string k = argv[1];
    
    // if(isalpha(argv[1]))
    // { 
    //     k = argv[1];
    // }
    
    
    string s = GetString();
    
    
    
    for(int i =0, x =0; i < strlen(s) ; i++)
    {
            if (isupper(s[i]))
        {
            printf("%c" , (s[i] -'A' + toupper(k[x % strlen(k)]) - 'A') % 26 + 'A');
            x++;
        }
        else if (islower(s[i]))
        {
            printf("%c" , (s[i] - 'a' + tolower(k[x % strlen(k)]) - 'a') % 26 + 'a');
            x++;
        }
        else
        {
          printf("%c" , s[i]);
        
        
        
        }
    
    }
    printf("\n");
    
    
 
    
}