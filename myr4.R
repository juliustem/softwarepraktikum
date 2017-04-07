#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/30-03-17_04-16-01/input")

args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
library(cluster)
library(genefilter)
library(affy)
library(affycomp)
library(affydata)
library(affyio)
library(simpleaffy)
library(sm)
library(BH)
library(bioDist)
library(MVA)
library(qcc)
#library(made4)
library(ade4)
library(NMF)
library(hugene20sttranscriptcluster.db)

Data2 <- ReadAffy()

setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery")

setwd(O)
png(filename="heatspearman.png")
aheatmap(cor(exprs(Data2), method = "spearman")) #mit Legende
title(main="Heatmap Spearman")
dev.off()


