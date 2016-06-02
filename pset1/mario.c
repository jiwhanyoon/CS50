#include <stdio.h>
#include <cs50.h>
#include <string.h>

int main(void)
{
    int h;
 
    // string s;
    
do
{
    printf("What height do you want?");
    h = GetInt();
}
while (0>h || h >23);
    
for (int row = 0; row < h ; row++) 
{
    for (int i = 0; i < h - (row+1); i++)
    {
        printf(" ");
    }
    for (int s = 0; s < row+2 ; s++)
    {
        printf("#");
        
    }
   printf("\n");
    
}
  
}