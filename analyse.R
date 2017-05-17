args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]

library(gtools)
setwd(P)

Gruppen <- read.table("affymetrix_rma.txt", header=TRUE)


a <- 1:21
b <- 21:1
f <- foldchange(a,b)
cbind(a,b,f)
q <- foldchange2logratio(f)

setwd("/Users/evka/Documents/Softwarepraktikum_Gruppe_1/")
result <- data.frame(cbind(Foldchange=f,SLR=q))
write.table(result,"auswertung.txt",sep="\t", row.names=T, col.names=T, quote=F)
