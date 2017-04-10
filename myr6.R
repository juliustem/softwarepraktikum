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



Data <- ReadAffy()

setwd("..")

setwd("output")


#source("/Users/evka/Documents/Softwarepraktikum_Gruppe_1/r_script/affyAnalysisQC_web.R")
#source("/Users/evka/Documents/Softwarepraktikum_Gruppe_1/r_script/affyAnalysisQC.R")
source("/Users/evka/Documents/Softwarepraktikum_Gruppe_1/r_script/affyQC_Module-master/functions_imagesQC.R")

pcaFun(Data,experimentFactor = 3,plotColors = 1:4, legendColors = 1:2, plotSymbols = 1:3, legendSymbols = 1:3)

