args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]


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
#library(simpleaffy)
#library(sm)
#library(BH)
#library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)

Data2 <- ReadAffy()

setwd("..")

setwd("output")
png(filename="RNA_Degradation_Plot.png")
deg <- AffyRNAdeg(Data2)
plotAffyRNAdeg(deg, col=1:N)
legend("topright", substr(sampleNames(Data2),1,20), lwd=3, lt = 1:length(sampleNames(Data2)),
       col = 1:N,cex=0.5, bty = "n") 

dev.off()