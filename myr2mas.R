
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

#MAS
mas5 <- mas5(Data)
mas <- log2(exprs(mas5))

setwd("..")

setwd("output")
png(filename="mashist.png")
plot(density(mas[,1]))
for (i in 2:N){
  points(density(mas[,i]), type = 'l', col=i)
  legend("topright", substr(sampleNames(Data),1,20), lwd=3,
         col = 1:N,cex=0.5, bty = "n") 
}

dev.off()