args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]
P1 <- args[4]
P2 <- args[5]

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
#library(cluster)
#library(genefilter)
library(affy)
#library(affycomp)
library(affydata)
library(affyio)
#library(simpleaffy)
#library(sm)
#library(BH)
#library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)
library(gtools)

setwd(P1)
G1 <- ReadAffy()
mas1 <- mas5(G1)
ma1 <- (exprs(mas1)) 
setwd('..')
setwd('..')
setwd('output')
write.table(ma1, "G1_mas.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)
setwd('..')
setwd('input/G2/')
G2 <- ReadAffy()
mas2 <- mas5(G2)
ma2 <- (exprs(mas2))
setwd('..')
setwd('..')
setwd('output')
write.table(ma2, "G2_mas.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

Data1 <- read.table("G1_mas.txt", header=TRUE)
Data2 <- read.table("G2_mas.txt", header=TRUE)

m1 <- apply(Data1, 1, FUN=mean)
m2 <- apply(Data2, 1, FUN=mean)

#G1_1 <- Data1$ND_51_CD14_133Plus_2.CEL
#G1_2 <- Data1$ND_52_CD14_133Plus_2.CEL
#G2_1 <- Data2$ND_5_CD14_IFNa2a_90_133Plus_2.CEL
#G2_2 <- Data2$ND_7_CD14_IFNa2a_90_133Plus_2.CEL

fc <- foldchange(m1, m2)
slr <- foldchange2logratio(fc, base=2)
result <- cbind(Foldchange=fc, Logratio=slr)

write.table(result, "FC_SLR_mas.txt", sep="\t", row.names=T, col.names=T, quote=F)

