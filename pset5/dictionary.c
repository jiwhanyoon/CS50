/**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */

#include <stdbool.h>
#include <strings.h>
#include <ctype.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>


#include "dictionary.h"

#define SIZE 262144

typedef struct node
{
    char word[LENGTH + 1];
    struct node* next;
}
node;

node* hashtable[SIZE];

unsigned int hash (char* word)
{
    unsigned int hash = 0;
    int n;
    for (int i = 0; word[i] != '\0'; i++)
    {
        // alphabet case
        if(isalpha(word[i]))
            n = word [i] - 'a' + 1;
        
        // comma case
        else
            n = 27;
            
        hash = ((hash << 3) + n);
    }
    return hash % SIZE;    
}
 
int counter = 0;
 
 /**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    // TODO
    FILE* file = fopen(dictionary, "r");
 
    if(file == NULL)
    {
        printf("Failed");
        return 2;
    }
    
    char buffer[LENGTH + 1];
    unsigned int index;
    while (fscanf(file, "%s\n", buffer) > 0)
    {
        index = hash(buffer);
        node* new_node = malloc(sizeof(node));
        if (new_node == NULL)
        {
            unload();
            return false;
        }
        new_node->next = hashtable[index];
        hashtable[index] = new_node;
        strcpy(new_node->word, buffer);
        counter++;
    }
   fclose(file);
    return true;
}
/**
 * Returns true if word is in dictionary else false.
 */
 
bool check(const char* word)
{
    char copy[strlen(word) + 1];
    strcpy (copy, word);
    for(int i = 0, n = strlen(word); i < n; i++)
    {
        copy[i] = tolower(copy[i]);
    }
   
    int index = hash(copy);
    node* newnode = hashtable[index];
    
    while (newnode != NULL)
    {
        if (strcasecmp(word, newnode->word) == 0)
        {
            return true;
        }
        newnode = newnode->next;
    }
    return false;
}



/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return counter;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    for(int i = 0; i < SIZE; i++)
    {
        node* cursor = hashtable[i];
        while (cursor != NULL)
        {
            node* temp = cursor;
            cursor = cursor->next;
            free(temp);
        }
    }
    return true;
}
