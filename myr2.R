#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/30-03-17_04-16-01/input")

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

Data2 <- ReadAffy()


png(filename="hist.png")
hist(Data2[,1:N])

#png(filename="gcc.png")
#plot.qc.stats(qc(Data2))

dev.off()


