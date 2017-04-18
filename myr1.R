args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
#library(cluster)
library(genefilter)
library(affy)
library(affycomp)
#library(affydata)
library(affyio)
library(simpleaffy)
#library(sm)
library(BH)
library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)
#library(NMF)
#library(hugene20sttranscriptcluster.db)



Data <- ReadAffy()

setwd("..")

setwd("output")


for (i in 1:N) {
  png(filename="chipimage%i.png")
  image(Data[,i],col=heat.colors(100))
}
dev.next()

#klappt nicht


