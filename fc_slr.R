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
#RMA
rma1 <- rma(G1)
#rma2 <- justRMA() kombi mit readaffy und rma
rm1 <- (exprs(rma1)) #rma
setwd('..')
setwd('..')
setwd('output')
write.table(rm1, "G1_rma.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)
setwd('..')
setwd('input/G2/')
G2 <- ReadAffy()
#RMA
rma2 <- rma(G2)
#rma2 <- justRMA() kombi mit readaffy und rma
rm2 <- (exprs(rma2)) #rma
setwd('..')
setwd('..')
setwd('output')
write.table(rm2, "G2_rma.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

Data1 <- read.table("G1_rma.txt", header=TRUE)
Data2 <- read.table("G2_rma.txt", header=TRUE)

m1 <- apply(Data1, 1, FUN=mean)
m2 <- apply(Data2, 1, FUN=mean)

#G1_1 <- Data1$ND_51_CD14_133Plus_2.CEL
#G1_2 <- Data1$ND_52_CD14_133Plus_2.CEL
#G2_1 <- Data2$ND_5_CD14_IFNa2a_90_133Plus_2.CEL
#G2_2 <- Data2$ND_7_CD14_IFNa2a_90_133Plus_2.CEL

fc <- foldchange(m1, m2)
slr <- foldchange2logratio(fc, base=2)
result <- cbind(Foldchange=fc, Logratio=slr)

write.table(result, "FC_SLR_rma.txt", sep="\t", row.names=T, col.names=T, quote=F)
