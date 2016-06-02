/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdio.h>

int main(int argc, char* argv[])
{ 
    // open the memory card file
    FILE* file = fopen("card.raw", "r");
    
    if (file == NULL)
    {
        printf("Nope. \n");
        return 1;
    }
 
    int counter = 0;
    unsigned char buf[512];
    char image[8];
    
    //initialize image
    FILE* outfile = NULL;
    
    //find beginning of jpg
    while(fread(buf, 1, 512 , file) == 512)
    {
       if(buf[0] == 0xff && buf[1] == 0xd8 && buf[2] == 0xff && buf[3] >= 0xe0 && buf[3] <= 0xef)
        {
            if(counter > 0)
            {
                fclose(outfile);
            }
            sprintf(image, "%03d.jpg" , counter);
            outfile = fopen(image, "a");
            counter++; 
        }
        if  (counter > 0)
        {
                fwrite(buf, 1, 512, outfile);
        }
    }

    fclose(file);
    fclose(outfile);
    return 0;
}
