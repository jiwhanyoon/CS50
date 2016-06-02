/**
 * copy.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
       
       
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./copy n infile outfile\n");
        return 1;
    }

    // remember filenames, making sure to account for the integer value that I will assign as the factor
    int factor =  atoi(argv[1]);
    char* infile = argv[2];
    char* outfile = argv[3];
    
    // make sure it is between 1 and 100
    if (factor < 1 || factor > 100)
    {
        printf("Factor must be between 1 and 100. \n");
        return 1;
    }

    // open input file 
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    // make another BITMAPFILEHEADER to copy the exact same values, just so that you can change the parameters within it
    BITMAPFILEHEADER bf, bfnew;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);
    bfnew = bf;

    // read infile's BITMAPINFOHEADER
    // do the same as BITMAPFILEHEADER
    BITMAPINFOHEADER bi, binew;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);
    binew = bi;

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }
    
    //change the parameters within the newly defined BMIH 
    //WITH RESPECT TO the original parameters
    binew.biWidth = bi.biWidth * factor;
    binew.biHeight = bi.biHeight * factor;
    
    //old padding and new padding - new padding must be with respect to the new width
    //height does not matter in writing paddings
    int padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    int newpadding = (4 - (binew.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;

    //since width and height has changed, the size of the image must also change to adapt to the new parameters
    // add new padding to account for the change in size
    //just like width * height, multiply by the new height
    // change size since image size has changed as well, by adding the difference between the old and new image sizes
    binew.biSizeImage = (binew.biWidth * sizeof(RGBTRIPLE) + newpadding) * abs(binew.biHeight);
    bfnew.bfSize = bf.bfSize - bi.biSizeImage + binew.biSizeImage;

    // write outfile's BITMAPFILEHEADER, the updated version, just the file headers
    fwrite(&bfnew, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER, the updated version, just the file headers
    fwrite(&binew, sizeof(BITMAPINFOHEADER), 1, outptr);
  
    // iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
    {
        // iterate over pixels in scanline
        for (int j = 0; j < factor; j++)
        {
            for (int k = 0; k < bi.biWidth; k++ )
            {
                
                // temporary storage
                RGBTRIPLE triple;

                // read RGB triple from infile
                fread(&triple, sizeof(RGBTRIPLE), 1, inptr);

                 // write RGB triple to outfile
                for (int x = 0; x < factor; x++)
                {
                     fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
                }
               
            }
            
            // make sure to add the padding to the newly defined outptr
            for (int q = 0; q < newpadding; q++)
            {
                fputc(0x00, outptr);
            }
                
            // places the pointer back to the beginning of the row
            if (j < factor - 1)
            {
                //trace backwards from the current position of the pointer
                fseek(inptr, -bi.biWidth * sizeof(RGBTRIPLE), SEEK_CUR);
            }
        }
        //place the pointer into inptr after skipping the old paddings from the current position
        fseek(inptr, padding, SEEK_CUR);
    }



    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;
    
}