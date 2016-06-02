/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
   int min = 0;
   int max = n-1;
   
   while(min<= max)
   {
       int mid = (min+max)/2;
       
       if (values[mid] == value)
       {
           return true;
       }
       else if (values[mid] > value)
       {
            max = mid -1;
       }
       else if (values[mid] < value)
       {
           min = mid+1;
       }
       
    
   }
   
   return false;
}

   
   
   
   
   
    // // TODO: implement a searching algorithm
    // if(n < 0)
    // {
    //     return false;
    // }
    
    // for (int i = 0; i < n; i++)
    // {
    //     if(value == values[i])
    //     {
    //         return true;
    //     }
       
    // }
    
    // return false; 


/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
        int temp;
        for (int j =0; j < n-1; j++)
        {
            if (values[j] > values[j+1])
            { 
                temp = values[j];
                values[j] = values[j+1];
                values[j+1] = temp;
                
        }
        
        
        
    }
    
    
}
// int temp; 
// for (int i =0; i < n-1; i++)
// {
//     for (int j = i+1; j < n-1; j++)
//     {
//         if (values[i] > values[j])
//         {
//               temp = values[j];
//                 values[j] = values[j+1];
//                 values[j+1] = temp;
//         }
       
//     }
// }