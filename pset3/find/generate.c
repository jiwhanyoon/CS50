/**
 * generate.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Generates pseudorandom numbers in [0,LIMIT), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 */
 
#define _XOPEN_SOURCE

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// constant
#define LIMIT 65536

int main(int argc, string argv[])
{
    // error check to make sure the argument is either 2 elemts or 3 elemts
    if (argc != 2 && argc != 3)
    {
        printf("Usage: generate n [s]\n");
        return 1;
    }

    // convert the character of the 1st index of the array "argv" into an integer
    int n = atoi(argv[1]);

    // situation when the user inputs 3 elemts, generate pseudorandom number by taking the 3rd elemt, change it to an integer, then change it to a long int form that srand48 can use
    //. If the user inputs anything other than 3 elemts(the only available option is 2 elemts), use the current time to generate a "pseudorandom number"
    if (argc == 3)
    {
        srand48((long int) atoi(argv[2]));
    }
    else
    {
        srand48((long int) time(NULL));
    }

    // repeat until it reaches the integer of ith index of array argv, drand48 would generate a number between 0 and 1 based on the values from srand48, multiply by the limit defined at the very beginning
    for (int i = 0; i < n; i++)
    {
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}