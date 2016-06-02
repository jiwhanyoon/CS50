#include <stdio.h>
#include <cs50.h>
#include <ctype.h>

int main(void)
{
    printf("What is the name?");
    string name = GetString();
    
    printf("%c", toupper(name[0]));
   
    for (int i = 0; name[i] != '\0'; i++)
    {
        
        if (name[i] == ' ')
        {
            printf("%c" , toupper(name[i+1]));
        }    
          
       
    }
   printf("\n");
   
}