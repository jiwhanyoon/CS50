#include <stdio.h>
#include <cs50.h>
#include <stdlib.h>
#include <string.h>


int main(int argc, string argv[])
{
    if (argc != 2)
        {
          printf("Wrong");
          return 1;
        }
        
    // printf("Type a sentence: ");
    string s = GetString();
    
    int k = atoi(argv[1]);
    
    for (int i = 0, n = strlen(s); i < n; i++)
    {
       if (65 <= s[i] && s[i] <= 90)
       {
           printf("%c" , (s[i] - 'A'+k) % 26 + 'A');
       }
       else if (97 <= s[i] && s[i] <= 122)
       {
           printf("%c" , (s[i] - 'a'+k) % 26 + 'a');
       }
       else
       {
           printf("%c" , s[i]);
       }
      
    }
     printf("\n");
   

}