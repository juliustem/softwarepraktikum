args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
#library(cluster)
#library(genefilter)
library(affy)
#library(affycomp)
library(affydata)
library(affyio)
library(simpleaffy)
#library(sm)
#library(BH)
#library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)

Data <- ReadAffy()

mas5 <- mas5(Data)
mas <- log2(exprs(mas5))

setwd("..")

setwd("output")

write.table(mas, "affymetrix_mas5.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)


