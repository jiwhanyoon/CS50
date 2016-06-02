#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int m;
    int b;
do
{
     printf("How many minutes do you shower?\n");
     m = GetInt();
}
while (m < 0);

b = m * 12;

printf("bottles: %i\n" , b);

    
}

