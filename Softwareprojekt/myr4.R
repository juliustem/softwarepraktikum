
args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]


setwd(P)


library(HSAUR2)
library(IRanges)
library(pkgmaker)
library(RColorBrewer)
library(registry)
library(rngtools)
library(S4Vectors)
library(datasets)
library(graphics)
library(grDevices)
library(KernSmooth)
library(methods)
library(parallel)
library(stats)
library(stats4)
library(tools)
library(utils)
library(gcrma)
library(AnnotationDbi)
library(org.Hs.eg.db)

library(BiocGenerics)
library(Biobase)
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

setwd("..")
setwd("output")

png(filename="heatspearman.png")
aheatmap(cor(exprs(Data2), method = "spearman")) #mit Legende
title(main="Heatmap Spearman")
dev.off()


