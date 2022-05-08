#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(int argc, char *argv[])
{
    // lire un fichier et le stocker dans un autre
    FILE *fichier_source, *fichier_destination;
    char caractere;
    fichier_source = fopen("../curl1.yaml", "r");
    fichier_destination = fopen("combined.yaml", "w");
    if (fichier_source != NULL && fichier_destination != NULL)
    {
        caractere = fgetc(fichier_source);
        while (caractere != EOF)
        {
            fputc(caractere, fichier_destination);
            caractere = fgetc(fichier_source);
        }
    }
    fclose(fichier_source);
    fichier_source = fopen("../curl2.yaml", "r");
    if (fichier_source != NULL && fichier_destination != NULL)
    {
        caractere = fgetc(fichier_source);
        while (caractere != EOF)
        {
            fputc(caractere, fichier_destination);
            caractere = fgetc(fichier_source);
        }
    }
    fclose(fichier_source);

    // transform the combined.yaml file into a .csv file
    FILE *fichier_csv_final;
    fichier_csv_final = fopen("combined.csv", "w");
    if (fichier_csv_final != NULL)
    {
        fputs("id,date,productId,price\n", fichier_csv_final);
        fichier_source = fopen("combined.yaml", "r");

        //get line by line
        char *line = NULL;
        size_t len = 0;
        ssize_t read;
        while ((read = getline(&line, &len, fichier_source)) != -1)
        {
            //get the id
            char *id = strtok(line, ":");
            printf("%s", id);
            //write the line in the csv file
            fprintf(fichier_csv_final, "%s\n", id);
        }
    }

    fclose(fichier_destination);

    return EXIT_SUCCESS;
}