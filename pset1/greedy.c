#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main(void)
{
    int q=0, d=0, n=0, p = 0;
    float f; 
    
    do
    {
        printf("How much change do you owe(in dollars)?");
        f = GetFloat();
    }
    while (f<0);
    
    int cents = round(f * 100);
    
    while (cents >= 25)
    {
        q++;
        cents = cents - 25;
    }
    printf("quarters: %i\n" , q);
    
    while (cents >= 10)
    {
     
       d++;
        cents = cents - 10;
        
    }
    printf("dimes: %i\n" , d);
    
    while (cents >= 5)
    {
        n++;
        cents = cents - 5;
    }
    printf("nickels: %i\n" , n);
    
     while (cents >= 1)
    {
        p++;
        cents = cents - 1;
    }
     printf("pennies: %i\n" , p);
     
    int total = q+d+n+p;
    printf("total coins: %i\n" , total);
}
