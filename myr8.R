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

setwd("..")

setwd("output")
png(filename="Rohcluster.png")

#Clustering:
dat <- exprs(Data)
d <- dist(t(dat))
hc <- hclust(d, method = "complete")
plot(hc)


dev.off()
